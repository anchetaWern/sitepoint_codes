(function(){
	angular.module('starter')
	.controller('CallController', ['$scope', '$state', '$timeout', '$ionicModal', 'SocketService', CallController]);
	
	function CallController($scope, $state, $timeout, $ionicModal, SocketService){
		
		var r = new Random();

		var id = r.integer(10000, 99999);
		$scope.id = id;

		$scope.contact = {};


		$scope.callInProgress = false;
		$scope.callIgnored = false;
		$scope.callEnded = false;


		SocketService.emit('login', {'id': id});


		$ionicModal.fromTemplateUrl('templates/call-modal.html', {
		    scope: $scope,
		    animation: 'slide-in-up'
		}).then(function(modal){
		    $scope.call_modal = modal;
		});


		function call(isInitiator, peer_id){
			
			var config = { 
				isInitiator: isInitiator,
				stun: {
					host: 'stun:stun.l.google.com:19302' 
				},
				turn: {
				  host: 'turn:numb.viagenie.ca',
				  username: 'webrtc@live.com',
				  password: 'muazkh'
				},
				streams: {
				  audio: true,
				  video: false
				}
			};

			var session = new cordova.plugins.phonertc.Session(config);

			session.on('sendMessage', function(data){ 
				
				SocketService.emit('sendMessage', {
				  'id': id,
				  'peer_id': $scope.peer_id, 
				  'type': 'phonertc_handshake',
				  'data': JSON.stringify(data)
				});
			});

			session.on('disconnect', function(){
			  SocketService.emit('sendMessage', { 'id': id, 'peer_id': $scope.peer_id, 'type': 'ignore' });
			  $scope.call_modal.hide();
			});

			session.call();

			$scope.contact = session; 
		}




		$scope.startCall = function(){
			
			$scope.isCalling = true;
		    $scope.callIgnored = false;
			$scope.callEnded = false;

 		    SocketService.emit('sendMessage', { 'id': id, 'peer_id': $scope.peer_id, type: 'call'});
		    $scope.call_modal.show();
			
		}



		$scope.closeModal = function(){
			$scope.call_modal.hide();
		};



		$scope.ignore = function(){

		  if(JSON.stringify($scope.contact) === '{}'){
			$scope.contact.disconnect();
		  }else{
			SocketService.emit('sendMessage', { 'id': id, 'peer_id': $scope.peer_id, 'type': 'ignore' });
	        $scope.call_modal.hide();
		  }
		  
	    };


	    $scope.end = function(){

	      $scope.contact.close();
	      $scope.contact = {};

	      SocketService.emit('sendMessage', { 'id': id, 'peer_id': $scope.peer_id, 'type': 'end' });
	      $scope.callInProgress = false;
	      $scope.callEnded = true;
	      $scope.call_modal.hide();
	    };


	    $scope.answer = function(){
	    	
	      if($scope.callInProgress){ 
	      	return; 
	      }
		  
	      $scope.callInProgress = true;

	      call(false, $scope.peer_id); 

	      setTimeout(function(){
	        SocketService.emit('sendMessage', { 'id': id, 'peer_id': $scope.peer_id, 'type': 'answer' });
	      }, 1500);
	    };


	    function onMessageReceive(message){
	
	      switch(message.type){

	        case 'answer':

	          $scope.$apply(function(){
	            $scope.callInProgress = true;
	          });

	          call(true, message.id);
	        break;

	        case 'ignore':

	        	$scope.callInProgress = false;
	        	$scope.callIgnored = true;
	        	$scope.callEnded = false;
	        	
	        break;

	        case 'phonertc_handshake':
	          
	            $scope.contact.receiveMessage(JSON.parse(message.data));
	          
	        break;

	        case 'call':
	        	$scope.isCalling = false;
				$scope.callIgnored = false;
				$scope.callEnded = false;

	          	$scope.call_modal.show();

	          	$scope.peer_id = message.id;

	          	$scope.current_modal = 'call_modal';
	        break;

	        case 'end':
	          	$scope.callInProgress = false;
	          	$scope.callEnded = true;
	          	$scope.callIgnored = false;
	        break;

	      } 
	    }

	    SocketService.on('messageReceived', onMessageReceive);

	    $scope.$on('$destroy', function(){ 
	      SocketService.removeListener('messageReceived', onMessageReceive);
	    });


	}

})();

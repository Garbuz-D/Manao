      function logout(){
	let response = await fetch('end_session.php', {
	method: 'POST',
	
      });
        if(!response.ok){
          alert('server error');
        }
	window.location.replace('../index.php');
      }   

      function formProc(formId){
	fetch(formId + '_proc.php', {
	method: 'POST',
	body: new FormData(document.getElementById(formId)),
      }).then(response => {
        if(!response.ok){
          alert('server error');
        }else{ 
	  response.json().then(msg => {
          if(!msg['OK']){
	    Object.keys(msg['errors']).forEach(key => {
	      document.getElementById(formId + '_' + key + '_err').innerHTML = msg['errors'][key];
   	    });
          }else{
            window.location.replace('../authorized.php');
          }
         });
        }
       });
      }
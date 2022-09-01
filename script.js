      window.onload = addListeners;

      function addListeners(){
event.preventDefault();
	document.getElementById('auth_submit').addEventListener('click', formProc, false);
        document.getElementById('reg_submit').addEventListener('click', formProc, false);
      }

      function logout(){
	fetch('end_session.php', {
	method: 'POST',
	
      }).then(response => {
        if(!response.ok){
          alert('server error');
        }
	window.location.replace('../index.php');
       });
      }   

      function formProc(){
event.preventDefault();
formId = event.target.name;
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
       return false;
      }
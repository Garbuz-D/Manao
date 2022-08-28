async function logout(){
	let response = await fetch('end_session.php', {
	method: 'POST',
	
      });
        if(!response.ok){
          alert('server error');
        }
        document.getElementById('logout').style.display = 'none';
	document.querySelector('main').style.display = 'block';
	document.querySelector('h1').innerHTML = 'Welcome. Log in or register';
      }   

      async function formProc(formId){
	let response = await fetch(formId + '_proc.php', {
	method: 'POST',
	body: new FormData(document.getElementById(formId)),
      });
        if(!response.ok){
          alert('server error');
        }else{
	  let msg = await response.json();
          if(!msg['OK']){
	    Object.keys(msg['errors']).forEach(key => {
	      document.getElementById(formId + '_' + key + '_err').innerHTML = msg['errors'][key];
   	    });
          }else{
            document.getElementById('logout').style.display = 'block';
	    document.querySelector('main').style.display = 'none';
	    document.getElementById('reg').reset();
	    document.getElementById('auth').reset();
	    document.querySelector('h1').innerHTML = 'Hello ' + document.cookie.match(/(?<=(name=))[a-zA-Z]+(?=[;$ ]?)/g);
          }
        }
      }
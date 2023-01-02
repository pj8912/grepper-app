<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Needed Answer!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container">

<h1 class="text-center mt-5">

  Needed Answer!
</h1>

<div class="mt-5" id="terms">

</div>

</div>
<script>

window.onload = () => getNeeded();


async function getNeeded(){

    const token = "YOUR_TOKEN" //string
    
    const userId = 'YOUR USERID'; //int


 await fetch('https://www.codegrepper.com/api/get_terms_needing_answers.php', {

	method: "GET",
	headers: {

		"Content-Type" : "application/json",
		"x-auth-token" : token,
		"x-auth-id" : userId
	}
})
  .then(response => response.json())
  .then(data => {

    let res = '';
    for(let i of data) {
        console.log(i)

    }

    for(var i=0; i < data.length; i++){
        const curr_t = data[i].term;
        res += `
            <div class="p-3 card m-1">
               
                <p>
                 <span id="query"> ${curr_t} </span>
                 <span style="background:green;color:white;padding:5px;width:inherit;border-radius:5px;">Bonu Points: ${data[i].bonus_points}</span>
              
                </p>`;

                const eurl = encodeURIComponent(curr_t);
                
               res += `<a href="upload.php?qu=${eurl}">Upload Answer</a>


                
            </div>

        `;

    }
    document.getElementById('terms').innerHTML = res;
})
  .catch(error => {
    console.error(error)
  })

}

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
</body>
</html>



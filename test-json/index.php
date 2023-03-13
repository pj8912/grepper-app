<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div style="padding:10px;margin-top:50px;">
        <div id="message-status"></div>
        
        <input type="text" placeholder="text" id="text-data">
        <button id="btn"onclick="uploadData()">submit</button>
    </div>

    <script>

       async function uploadData(){

            const indata =document.getElementById('text-data').value
            const statusBox = document.getElementById('message-status')
            
           await fetch('test-json/upload.php',{
                method : "POST",
                body : JSON.stringify({
                 data :    indata
                })
                

            })
            .then((res)=> res.json())
            .then((response)=>{
                if(response.status == 1){
                    const divElement = document.createElement('div');
                    divElement.style.border = '2px solid green';
                    divElement.innerHTML = response.message;

                    statusBox.appendChild(divElement)
                    document.getElementById('text-data').value = '';

                }
                
            })
            .catch(err => console.log(err))
            fetchData();
        }

    async function fetchData(){
        await fetch('http://localhost:4000/test-json/fetch.php')
        .then(res => res.json())

        
        .then((response) => {
            let output = '';
            for(let i in response){

                console.log(response[i].testdata)
            }
        })
        .catch( err => console.log(err) )
    }
    
    window.onload = fetchData();

</script>
</body>
</html>
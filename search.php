<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container">
        
        
        <div class="m-auto mt-5">
            
            <h3>CodeGrepper Search</h3>
            <div  style="display: flex; flex-direction:row">
                <input id="search-query" class="form-control me-2 w-50" type="search" placeholder="Search" aria-label="Search"><br>
                <button onclick="getResults(); getSimilarQueries()"  class="btn btn-primary" type="button">Search</button>
            </div>
        </div>
    
    
    
    <div class="" style="display: flex; flex-direction:row">

        <!-- results -->
        
        
        <div class="mt-4  card card-body col-md-6 m-1">
            <h4 class="m-2">Results</h4>
        
            <div id="results" class="mt-1 m-2">
                
            </div>
        </div>
            
            
            
            
            <!-- similar queries -->
        <div  class="col-md-6 card card-body mt-4 m-1">
            <h4 class="m-2">Similar Queries</h4>
            <div id="sq" class="mt-1 m-2">
                
            </div>
            
        </div>
    </div>
        
        
        
    </div>
        
        
        
    

<script>

    const APIVersion = 3;
    
    async function getResults(){
    let Query = document.getElementById('search-query').value;
    console.log(Query);

    return await fetch(`https://www.codegrepper.com/api/get_answers_1.php?v=${APIVersion}&s=${encodeURI(Query)}`)
    .then((response) => {
        return response.json()
    })
  .then((data) => {
    console.log(data)

    console.log(data['answers']);
    let res = '';
    let a = data['answers'];
    // console.log(a.length)

    for(let i=0; i < a.length; i++){
        console.log(a[i]['answer'])
        let answers = a[i]['answer'];
        res += `<code class="card p-2">${answers}</code><br>`
    }

    document.getElementById('results').innerHTML = res ;

  })
  .catch((err) => {
    console.log(err);
  });

}

async function getSimilarQueries(){
    let Query = document.getElementById('search-query').value;

    await fetch(`https://www.codegrepper.com/api/search_term_alternatives.php?q=${Query}`
    )
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        // console.log(data);
        let res = '';
        let r = data['related_terms']
        for(let i=0; i < r.length; i++){
            terms =  r[i]['term']
            res  += `<span class="mt-1" >${terms}</span><br>` 
        }
     

    
        document.getElementById('sq').innerHTML = res;

    })
    .catch((err) => {
        console.log(err);
    });

}


</script>



</body>
</html>
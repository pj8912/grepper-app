# grepper-app
Application built using CodeGrepper API

CodeGrepperAPI: https://github.com/Code-Grepper/Code-Grepper-API-Documentation

## Working

The `needed answers` are used to fetch the queries and `publish answer` allows us to publish answer for a query we click on.

Two APIs  are used:
 - Needed Answers
 - Publish Answer

### Needed Answers
This API  allows us to fetch Queries that needed answers

### Publish Answer
This API allows us to publish answer for a search term/query

------------------

Authorization depends upon the type of API you use.

*** The important things that are required for authorization are your `userid` and `access-token` ***

Get Your Access Token : https://github.com/Code-Grepper/Code-Grepper-API-Documentation/blob/main/docs/auth/TOKEN.MD

------------------


## Fetched Needed Answers
 
 
 ![Screenshot from 2023-01-02 14-24-46](https://user-images.githubusercontent.com/59218902/210212119-87c9896f-879e-49cf-b17b-e86628b2eaec.png)


  click uploadanswer to upload answer to that specific query. This uses the Needed Answers API


## Publish Answer

![Screenshot from 2023-01-02 14-41-39](https://user-images.githubusercontent.com/59218902/210212224-476ec720-3946-4ac9-9120-64682a8f6daf.png)


 This API  requires the `query`, `language` and the `answer` to  publish the answer.

    
## Search and Similar Queries

![Screenshot from 2023-01-03 11-46-49](https://user-images.githubusercontent.com/59218902/210308789-a667f1db-28f2-45f5-9c0c-a4bbfa9b3b4d.png)

 This uses `Get Answers` and `SIMILIARQUERIES` API for getting answers for our query and similar queries respectively
 
 `Get Answers` API : https://github.com/Code-Grepper/Code-Grepper-API-Documentation/blob/main/docs/answers/GETANSWERS.MD
 `SIMILARQUERIES` API: https://github.com/Code-Grepper/Code-Grepper-API-Documentation/blob/main/docs/answers/SIMILIARQUERIES.MD
 
 

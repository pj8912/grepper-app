<select onclick="getVal()" id="lang" class="form-control" >
    <option  value="assembly">Assembly</option>
    <option  value="c">C</option>
    <option  value="css">CSS</option>
    <option  value="html">Html</option>
    <option  value="javascript">Javascript</option>
    <option   value="php">PHP</option>
    <option  value="python">Python</option>
    <option  value="shell">Shell/Bash</option>
    <option  value="sql">SQL</option>
    <option  value="whatever">Whatever</option>
</select>


<script>

    function getVal(){
        var s = document.getElementById('lang').value;
        console.log(s)
    }

</script>

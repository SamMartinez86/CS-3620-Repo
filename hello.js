

<script>

    function hello(){
        fetch('http://example.com/movies.json')
        .then(response => response.json())
        .then(data => console.log(data));
    }

</script>



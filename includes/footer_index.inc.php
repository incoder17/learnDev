<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/jquery.js">
</script>
<script src="js/custom.js">
</script>
<script>
$(document).ready(function() {
    $("#li").on('click', function() {
        var id = $("a").attr("id");
        alert(id);
    });
});
</script>


</body>


</html>
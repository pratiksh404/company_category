<script>
    // Show Image
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#company_image').hide();
                $('#company_image_plcaeholder')
                    .attr('src', e.target.result)
                    .width(200)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
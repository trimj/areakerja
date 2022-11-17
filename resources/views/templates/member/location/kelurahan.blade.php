<script>
    function Kelurahan(id) {
        if (id !== undefined) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                let html = '';
                html += "<option value=" + data.id + ">" + data.nama + "</option>";
                document.getElementById("kelurahan").innerHTML = html;
            });
        } else {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' + document.getElementById("kecamatan").value).then((response) => {
                return response.json();
            }).then((data) => {
                let html = '<option>Pilih Kelurahan</option>';
                for (var i = 0; i < data['kelurahan'].length; i++) {
                    html += "<option value=" + data['kelurahan'][i].id + ">" + data['kelurahan'][i].nama + "</option>";
                }
                document.getElementById("kelurahan").innerHTML = html;
            });
        }
    }
</script>

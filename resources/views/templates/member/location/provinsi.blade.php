<script>
    function Provinsi(id) {
        if (id !== undefined) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                let html = '';
                html += "<option value=" + data.id + ">" + data.nama + "</option>";
                document.getElementById("provinsi").innerHTML = html;
            });
        } else {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi').then((response) => {
                return response.json();
            }).then((data) => {
                let html = '<option>Pilih Provinsi</option>';
                for (var i = 0; i < data['provinsi'].length; i++) {
                    html += "<option value=" + data['provinsi'][i].id + ">" + data['provinsi'][i].nama + "</option>";
                }
                document.getElementById("provinsi").innerHTML = html;
            });
        }
    }
</script>

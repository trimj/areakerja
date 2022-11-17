<script>
    function Kota(id) {
        if (id !== undefined) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kota/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                let html = '';
                html += "<option value=" + data.id + ">" + data.nama + "</option>";
                document.getElementById("kota").innerHTML = html;
            });
        } else {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + document.getElementById("provinsi").value).then((response) => {
                return response.json();
            }).then((data) => {
                let html = '<option>Pilih Kota/Kabupaten</option>';
                for (var i = 0; i < data['kota_kabupaten'].length; i++) {
                    html += "<option value=" + data['kota_kabupaten'][i].id + ">" + data['kota_kabupaten'][i].nama + "</option>";
                }
                document.getElementById("kota").innerHTML = html;
            });
        }
    }
</script>

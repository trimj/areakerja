<script>
    function Kecamatan(id) {
        if (id !== undefined) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                let html = '';
                html += "<option value=" + data.id + ">" + data.nama + "</option>";
                document.getElementById("kecamatan").innerHTML = html;
            });
        } else {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + document.getElementById("kota").value).then((response) => {
                return response.json();
            }).then((data) => {
                let html = '<option>Pilih Kecamatan</option>';
                for (var i = 0; i < data['kecamatan'].length; i++) {
                    html += "<option value=" + data['kecamatan'][i].id + ">" + data['kecamatan'][i].nama + "</option>";
                }
                document.getElementById("kecamatan").innerHTML = html;
            });
        }
    }
</script>

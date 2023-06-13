<x-guest-layout>
  
  <section class="pegawai-section trick" id="trick">
    <h2 class="section__title">Pegawai</h2>
    <div class="cari-pegawai"><input type="text" placeholder="Cari...." class="rounded" id="inputCari"/></div>
    <div id="pegawai" class=""></div>
    <div id="pagination">
                  <ul class="pagination-list">
                    <li>
                      <button onclick="pertama()" id="pertama">Pertama</button>
                      <button onclick="sebelumnya()" id="sebelumnya">Sebelumnya</button>
                      <button onclick="selanjutnya()" id="selanjutnya">Selanjutnya</button>
                      <button onclick="terakhir()" id="terakhir">Terakhir</button>
                    </li>
                  </ul>
                </div>
  </section>
  
  <script>
    let data = JSON.parse('<?php echo str_replace("'", "\'", $json); ?>');
    const pegawai = document.getElementById('pegawai');
    function listPegawai(){
    data.forEach((e) => {
      const div = document.createElement('div');
      div.className = 'pegawai-card';
      div.innerHTML = `
      
        <img class="img-pegawai" src="${e.foto}">
      
        <table class="pegawai-detail">
        <tr>
        <td>Nama</td>
        <td><h3 class="trick__title">: ${e.nama_beserta_gelar}</h3></td>
        </tr>
        <td>NIP</td>
        <td>: ${e.nip}</td>
        </tr>
        <td>Alamat</td>
        <td>: ${e.alamat}</td>
        </tr>
        <td>No HP</td>
        <td>: ${e.no_hp}</td>
        </tr>
        </table>
      
      `;
      pegawai.appendChild(div);
    });
  }

  listPegawai();

    
        const searchInput = document.getElementById('inputCari');

searchInput.addEventListener('input', function() {
  const kataKunci = this.value.trim().toLowerCase();
  
  if(kataKunci != ''){
    filterData(kataKunci);
  }
  else {
    listPegawai();
  }
});



function filterData(kataKunci) {
  pegawai.innerHTML = '';

  const hasilPencarian = data.filter(e => {
    const name = e.nama_beserta_gelar.toLowerCase();
    const nip = e.nip.toLowerCase();

    return name.includes(kataKunci) || nip.includes(kataKunci);
  });


  if(hasilPencarian.length > 0){
  hasilPencarian.forEach((e) => {
     const div = document.createElement('div');
      div.className = 'pegawai-card';
      div.innerHTML = `
      
        <img class="img-pegawai" src="${e.foto}">
      
        <table class="pegawai-detail">
        <tr>
        <td>Nama</td>
        <td><h3 class="trick__title">: ${e.nama_beserta_gelar}</h3></td>
        </tr>
        <tr>
        <td>NIP</td>
        <td>: ${e.nip}</td>
        </tr>
        <tr>
        <td>Alamat</td>
        <td>: ${e.alamat}</td>
        </tr>
        <tr>
        <td>No HP</td>
        <td>: ${e.no_hp}</td>
        </tr>
        </table>
      
      `;
      pegawai.appendChild(div);
  });
  }
  else {
    const baris = `
      
        <div style="text-align: center">Data tidak ada</div>
      
    `;
    pegawai.innerHTML = baris;
  }
}
 


  </script>
  
</x-guest-layout>

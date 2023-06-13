<x-guest-layout>
  
  <section class="pegawai-section trick" id="trick">
    <h2 class="section__title">Surat</h2>
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
    let data = [
    	{
    	nama_surat: 'Surat 1',
    	link_surat: 'google.com',
    	keterangan: 'Surat Pendaftaran Siswa Baru'
        },
        {
    	nama_surat: 'Surat 2',
    	link_surat: 'google.com',
    	keterangan: 'Surat Pendaftaran Ekstrakurikuler'
        }
    ]
    const pegawai = document.getElementById('pegawai');
    function listPegawai(){
    pegawai.innerHTML = '';
    data.forEach((e) => {
      const div = document.createElement('div');
      div.className = 'pegawai-card';
      div.innerHTML = `
      
        <button class="img-pegawai">Download</button>

        <table class="pegawai-detail">
        <tr>
        <td>${e.nama_surat}</td>
        </tr>
        <tr>
        <td>${e.keterangan}</td>
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
    const name = e.nama_surat.toLowerCase();
    const keterangan = e.keterangan.toLowerCase();

    return name.includes(kataKunci) || keterangan.includes(kataKunci);
  });


  if(hasilPencarian.length > 0){
  hasilPencarian.forEach((e) => {
     const div = document.createElement('div');
      div.className = 'pegawai-card';
      div.innerHTML = `
      
        <button class="img-pegawai">Download</button>

        <table class="pegawai-detail">
        <tr>
        <td>${e.nama_surat}</td>
        </tr>
        <tr>
        <td>${e.keterangan}</td>
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

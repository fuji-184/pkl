<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="container" class="container-tabel">
      
    </div>
    
    <div id="container-modal" class="container-modal">
    <div class="modal">
        <p>Apakah Anda Yakin Ingin Menghapus data ini?</p>
        <form id="hapusForm" method="post" action="{{ route('pegawai.destroy', ':id') }}">
            @csrf
            @method('DELETE')
            <button type="submit">Iya</button>
        </form>
        <div class="batal">
          <button onclick="tutupModal()">Batal</button>
        </div>
    </div>
</div>

    
    <script>
      const tabel = `
      <div class="menu-tabel">
        <button onclick="tambah()" class="tambah">Tambah</button>
        <button onclick="cari()" id="buka-cari" class="tombol">Cari</button>
        <span class="urutContainer">
          <button class="tombol" onclick="tampilkanUrut()" id="btn-urut">Urutkan</button>
          <span class="urut" id="urut">
            <button onclick="urutNamaAscending()">A ke Z</button>
            <button onclick="urutNamaDescending()">Z ke A</button>
          </span>
        </span>
        <span id="cari" class="cari">
          
            <input type="text" placeholder="Cari...." class="rounded" id="inputCari"/>
          
        </span>
      </div>
      <div class="tabel">
        <table>
          <thead>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
          </thead>
          <tbody id="data">
            
            
          </tbody>
          <tfoot>
            <tr>
              <td class="paginasi" colspan="7">
             
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
                
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
      `;
      
      let data = JSON.parse('<?php echo str_replace("'", "\'", $json); ?>');
      
      let index = 0;
      let tampil = index+5;
      
      function dataTabel(){
        const barisContainer = document.getElementById('data');
        barisContainer.innerHTML = '';
        for(let i=index; i<tampil; i++){
            const baris = document.createElement('tr');
            let no = i+1;
            baris.innerHTML = `
              <td>${no}</td>
              <td><img onclick="gmbr()" class="gambar-crud" src="${data[i].foto}" /></td>
              <td>${data[i].nama_beserta_gelar}</td>
              <td>${data[i].nip}</td>
              <td>${data[i].jabatan}</td>
              <td>${data[i].tanggal_lahir}</td>
              <td>${data[i].alamat}</td>
              <td>${data[i].no_hp}</td>
              <td class="aksi">
                <i class="fa-solid fa-eye"></i>
                <i class="fa-solid fa-pen-to-square" onclick="edit(this)" data-id="${data[i].id}" data-no="${i}"></i>
                <i class="fa-solid fa-trash" onclick="hapus(this)" data-id="${data[i].id}"></i>
              </td>
            `;
            
            barisContainer.appendChild(baris);
            
          }
          
          const pertama = document.getElementById("pertama");
          const sebelumnya = document.getElementById("sebelumnya");
          const selanjutnya = document.getElementById("selanjutnya");
          const terakhir = document.getElementById("terakhir");
         
          if(index === 0){
            pertama.disabled = true;
            pertama.classList.add('nonaktif');
            sebelumnya.disabled = true;
            sebelumnya.classList.add('nonaktif');
            selanjutnya.disabled = false;
            selanjutnya.classList.remove('nonaktif');
            terakhir.disabled = false;
            terakhir.classList.remove('nonaktif');
          }
          else if(tampil === data.length){
            pertama.disabled = false;
            pertama.classList.remove('nonaktif');
            sebelumnya.disabled = false;
            sebelumnya.classList.remove('nonaktif');
            selanjutnya.disabled = true;
            selanjutnya.classList.add('nonaktif');
            terakhir.disabled = true;
            terakhir.classList.add('nonaktif');
          }
          else {
            pertama.disabled = false;
            pertama.classList.remove('nonaktif');
            sebelumnya.disabled = false;
            sebelumnya.classList.remove('nonaktif');
            selanjutnya.disabled = false;
            selanjutnya.classList.remove('nonaktif');
            terakhir.disabled = false;
            terakhir.classList.remove('nonaktif');
          }
          
      }
      /*

   function gmbr(){
      document.querySelectorAll('.gambar-crud').forEach((e)=>{
  e.addEventListener('click', (f)=>{
f.target.style.cssText = "position: absolute; width: 70%; top: 50%; left: 50%; transform: translate(-50%, -50%); box-shadow: 1px 1px 2px black; border-radius: 12px;";
  });
});
     }
*/



      function pertama(){
        index = 0;
        tampil = index+5;
        dataTabel();
      }
      
      function sebelumnya(){
        if(index > 5){
          index = index-5;
          tampil = index+5;
          dataTabel();
        }
        else {
          index = 0;
          tampil = index+5;
          dataTabel();
        }
      }
      
      function selanjutnya(){
        if(data.length - index > 5){
          index = index+5;
          tampil = index+5;
          dataTabel();
        }
        else {
          tampil = data.length;
          dataTabel();
        }
      }
      
      function terakhir(){
        index = data.length-5;
        tampil = data.length;
        dataTabel();
      }
      
      
      document.addEventListener('DOMContentLoaded', ()=>{
        
          dataTabel();
          cariData();
          
      });
      
      function cariData(){
        const searchInput = document.getElementById('inputCari');

searchInput.addEventListener('input', function() {
  const kataKunci = this.value.trim().toLowerCase();
  if(kataKunci != ''){
    filterData(kataKunci);
  }
  else {
    dataTabel();
  }
});

const dataUserContainer = document.getElementById('data');


function filterData(kataKunci) {
  dataUserContainer.innerHTML = '';

  const hasilPencarian = data.filter(e => {
    const name = e.nama_beserta_gelar.toLowerCase();
    const nip = e.nip.toLowerCase();

    return name.includes(kataKunci) || nip.includes(kataKunci);
  });

  if(hasilPencarian.length > 0){
  hasilPencarian.forEach((data, i) => {
    const baris = document.createElement('tr');
    baris.innerHTML = `
      <td>${i+1}</td>
              <td><img class="gambar-crud" src="${data.foto}" /></td>
              <td>${data.nama_beserta_gelar}</td>
              <td>${data.nip}</td>
              <td>${data.jabatan}</td>
              <td>${data.tanggal_lahir}</td>
              <td>${data.alamat}</td>
              <td class="aksi">
                <i class="fa-solid fa-eye"></i>
                <i class="fa-solid fa-pen-to-square" onclick="edit(this)" data-id="${data.id}" data-no="${i}"></i>
                <i class="fa-solid fa-trash" onclick="hapus(this)" data-id="${data.id}"></i>
              </td>
  
    `;
    dataUserContainer.appendChild(baris);
  });
  }
  else {
    const baris = `
      <tr>
        <td style="text-align: center" colspan="4">Data tidak ada</td>
      </tr>
    `;
    dataUserContainer.innerHTML = baris;
  }
}


      }
      
      const container = document.getElementById('container');
      container.innerHTML = tabel;
      function tambah(){
        const formTambah = `
          <div>
            <form action="{{ route('pegawai.store') }}" method="POST"  enctype="multipart/form-data">
              @csrf
              @method('POST')
              <label>Nama Beserta Gelar</label>
              <input type="text" name="name" class="rounded" required>
              <label>NIP</label</label>
              <input type="number" class="rounded" name="nip" required/>
              <label>Jabatan</label>
              <select class="rounded" name="jabatan" required>
              <option value=""> ~ </option>
              <option value="Kepala Sekolah">Kepala Sekolah</option>
              <option value="Guru">Guru</option>
              <option value="Pegawai">Pegawai</option>

              </select><br>
              <label>Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="rounded" required>
            
              <label>Alamat</label</label>
              <input type="text" class="rounded" name="alamat" />
              <label>No HP</label</label>
              <input type="text" class="rounded" name="no_hp"/>

              <label>Foto</label>
              <input type="file" class="rounded" name="foto" />
              
              
              <div>
                <button class="tombol" type="submit">Submit</button>
                <button onclick="kembali()" class="tombol">Kembali</button>
                </div>
            </form>
          </div>
        `;
        container.innerHTML = formTambah;
      };
      
      function edit(baris) {
        const id = baris.dataset.id;
        const no = baris.dataset.no;
        const formEdit = `
          <div>
            <form action="/pegawai/${id}" method="POST"  enctype="multipart/form-data">
              @csrf
              @method('POST')
              <label>Nama Beserta Gelae</label>
              <input value="${data[no].nama_beserta_gelar}" type="text" name="name" class="rounded" required>
              <label>NIP</label>
              <input value="${data[no].nip}" type="number" class="rounded" name="nip" required/>
              <label>Jabatan</label>
              <select id="jabatan" class="rounded" name="jabatan" required>
              <option value=""> ~ </option>
              <option value="Kepala Sekolah">Kepala Sekolah</option>
              <option value="Guru">Guru</option>
              <option value="Pegawai">Pegawai</option>

              </select><br>
              <label>Tanggal Lahir</label>
              <input value="${data[no].tanggal_lahir}"tanggal_lahir type="date" name="tanggal_lahir" class="rounded" required>
            
              <label>Alamat</label>
              <input value="${data[no].alamat}" type="text" class="rounded" name="alamat" />
              <label>No HP</label>
              <input value="${data[no].no_hp}" type="text" class="rounded" name="no_hp"/>

              <label>Foto</label>
              <img src="${data[no].foto}" class="gambar-crud"/>
              <input value="${data[no].foto}" type="file" class="rounded" name="foto" />
              
              
              <div>
                <button class="tombol" type="submit">Submit</button>
                <button onclick="kembali()" class="tombol">Kembali</button>
                </div>
            </form>
          </div>
        `;
        
        container.innerHTML = formEdit;
        
        const role = document.getElementById('jabatan');
        for (let i = 0; i < role.options.length; i++) {
          if (role.options[i].value === data[no].jabatan) {
            role.options[i].selected = true;
          }
        }
        
      
      };
            
      function kembali(){
        container.innerHTML = tabel;
        dataTabel();
        cariData();
      };
 function hapus(data) {
    const modal = document.getElementById('container-modal');
    const id = data.dataset.id;
    modal.style.display = 'flex';

    const form = document.getElementById('hapusForm');
    const actionUrl = form.getAttribute('action').replace(':id', id);
    form.setAttribute('action', actionUrl);
}



      function tutupModal(){
       const modal = document.getElementById('container-modal');
       modal.style.display = 'none';
      };
      function hapus2(id){
        tutupModal();
      }
      
      // cari
      let tampilCari = false;
      function cari(){
        tampilCari = !tampilCari;
        if(tampilCari){
          document.getElementById('cari').style.display = 'block';
          document.getElementById('buka-cari').textContent = 'Tutup';
        }
        else {
          document.getElementById('cari').style.display = 'none';
          document.getElementById('buka-cari').textContent = 'Cari';
        }
        
        
        dataTabel();
      }
      
      //pengurutan
      function urutNamaAscending(){
        data.sort((a, b) => {
          const namaA = a.name.toUpperCase();
          const namaB = b.name.toUpperCase();
        
          if (namaA < namaB) {
            return -1;
          }
          if (namaA > namaB) {
            return 1;
          }
          return 0;
        });
        
        dataTabel();

      }
      
      function urutNamaDescending(){
        data.sort((a, b) => {
          const namaA = a.name.toUpperCase();
          const namaB = b.name.toUpperCase();
        
          if (namaA < namaB) {
            return 1; // Mengembalikan nilai positif untuk mengurutkan 'a' setelah 'b'
          }
          if (namaA > namaB) {
            return -1; // Mengembalikan nilai negatif untuk mengurutkan 'a' sebelum 'b'
          }
          return 0;
        });
        
        dataTabel();

      }
      
      let tampilUrutkan = false;
      function tampilkanUrut(){
        tampilUrutkan = !tampilUrutkan;
        if(tampilUrutkan){
          document.getElementById('urut').style.display = 'block';
          document.getElementById('btn-urut').textContent = 'Tutup';
        }
        else {
          document.getElementById('urut').style.display = 'none';
          document.getElementById('btn-urut').textContent = 'Urutkan';
        }
      }
   
    </script>
    
</x-app-layout>

<
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
        <form id="hapusForm" method="post" action="{{ route('users.destroy', ':id') }}">
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
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
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
              <td>${data[i].name}</td>
              <td>${data[i].email}</td>
              <td>${data[i].role}</td>
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

  const hasilPencarian = data.filter(user => {
    const name = user.name.toLowerCase();
    const email = user.email.toLowerCase();

    return name.includes(kataKunci) || email.includes(kataKunci);
  });

  if(hasilPencarian.length > 0){
  hasilPencarian.forEach((user, index) => {
    const baris = document.createElement('tr');
    baris.innerHTML = `
      <td>${index+1}</td>
      <td>${user.name}</td>
      <td>${user.email}</td>
      <td>${user.role}</td>
      <td class="aksi">
                <i class="fa-solid fa-eye"></i>
                <i class="fa-solid fa-pen-to-square" onclick="edit(this)" data-id="${index}"></i>
                <i class="fa-solid fa-trash" onclick="hapus(this)" data-id="${index}"></i>
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
            <form action="{{ route('users.store') }}" method="POST">
              @csrf
              @method('POST')
              <label>Nama</label>
              <input type="text" name="name" class="rounded" required>
              <label>Email</label>
              <input type="text" name="email" class="rounded" required>
              <label>Password</label>
              <input type="text" name="password" class="rounded" required>
              <label>Role</label>
              <select name="role" required>
              <option value="">-</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
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
            <form action="/users/${id}" method="POST">
              @csrf
              <input type="hidden" name="_method" value="PUT">
              <label>Nama</label>
              <input type="text" name="name" class="rounded" value="${data[no].name}" required>
              <label>Email</label>
              <input type="text" name="email" class="rounded" value="${data[no].email}" required>
              <label>Edit Password</label>
              <input type="checkbox" id="pw">
              <label class="pw">Password</label>
              <input type="text" name="password" class="rounded pw" placeholder="Masukkan password baru">
              <label>Role</label>
              <select id="role" name="role" required>
                <option value="">-</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
              <div>
                <button class="tombol" type="submit">Submit</button>
                <button onclick="kembali()" class="tombol">Kembali</button>
              </div>
            </form>
          </div>
        `;
        
        container.innerHTML = formEdit;
        
        const role = document.getElementById('role');
        for (let i = 0; i < role.options.length; i++) {
          if (role.options[i].value === data[no].role) {
            role.options[i].selected = true;
          }
        }
        
        const edit = document.getElementById('pw');
        const pwElements = document.querySelectorAll('.pw');
        let tampilEditPw = false;
        
        edit.addEventListener('click', () => {
          tampilEditPw = !tampilEditPw;
          
          pwElements.forEach((e) => {
            e.style.display = tampilEditPw ? 'block' : 'none';
          });
        });
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
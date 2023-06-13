<x-guest-layout>
<div class="cari-pegawai"><input type="text" placeholder="Cari...." class="rounded" id="inputCari"/></div>
<div id="artikel">

</div>
 <div id="pagination">
                  <ul class="pagination-post">
                    <li>
                      <button onclick="pertama()" id="pertama">Pertama</button>
                      <button onclick="sebelumnya()" id="sebelumnya">Sebelumnya</button>
                      <button onclick="selanjutnya()" id="selanjutnya">Selanjutnya</button>
                      <button onclick="terakhir()" id="terakhir">Terakhir</button>
                    </li>
                  </ul>
                </div>

	<script>
		let data = JSON.parse('<?php echo addslashes($json); ?>');

		const artikel = document.getElementById('artikel');

		let index = 0;

		let tampil = index+6;

		function dataTabel(){
		artikel.innerHTML = '';
		for(let i=index; i<tampil; i++){
			const container = document.createElement('div');

			container.className = 'card-post rounded';

			container.innerHTML = `
          
            <img src="${data[i].gambar}" alt="" class="gambar-post rounded">
            <h3 class="judul-post">${data[i].judul}</h3>
           

            
            <button class="tombol-baca rounded">
              Baca
            </button>
 			`;
 			
			artikel.appendChild(container);

		};
	
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
      dataTabel();
      function pertama(){
        index = 0;
        tampil = index+6;
        dataTabel();
      }
      
      function sebelumnya(){
        if(index > 6){
          index = index-6;
          tampil = index+6;
          dataTabel();
        }
        else {
          index = 0;
          tampil = index+6;
          dataTabel();
        }
      }
      
      function selanjutnya(){
        if(data.length - index > 6){
          index = index+6;
          tampil = index+6;
          dataTabel();
        }
        else {
          tampil = data.length;
          dataTabel();
        }
      }
      
      function terakhir(){
        index = data.length-6;
        tampil = data.length;
        dataTabel();
      }

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



function filterData(kataKunci) {
  artikel.innerHTML = '';

  const hasilPencarian = data.filter(e => {
    const judul = e.judul.toLowerCase();
    const konten = e.konten.toLowerCase();

    return judul.includes(kataKunci) || konten.includes(kataKunci);
  });


  if(hasilPencarian.length > 0){
  hasilPencarian.forEach((e) => {
  	 const container = document.createElement('div');
     container.className = 'card-post rounded';

			container.innerHTML = `
          
            <img src="${e.gambar}" alt="" class="gambar-post rounded">
            <h3 class="judul-post">${e.judul}</h3>
           

            
            <button class="tombol-baca rounded">
              Baca
            </button>
 			`;
      artikel.appendChild(container);
  });
  }
  else {
    const baris = `
      
        <div style="text-align: center">Data tidak ada</div>
      
    `;
    artikel.innerHTML = baris;
  }
}
 
	</script>

</x-guest-layout>
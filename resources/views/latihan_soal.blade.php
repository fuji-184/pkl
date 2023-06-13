<x-guest-layout>
  <div class="chat-container">
    <div class="chat">
      <div style="margin-top: 80px" class="chat-header">
        <h2 class="h2-chat"></h2>
      
      </div>
      <div class="isi-chat"></div>
      <form class="ketik-chat">
        <input type="text" id="pesan" name="pesan" placeholder="Buat Pertanyaan Baru" />
        <button type="submit">Kirim</button>
      </form>
    </div>
  </div>

  <style>
    .isi-chat .pesan:not(:last-child) {
      margin-bottom: 20px;
    }

    .loading-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .loading-spinner {
      display: inline-block;
      width: 40px;
      height: 40px;
      border: 4px solid #f3f3f3;
      border-top: 4px solid #3498db;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    .pesan-container, .pesan-container p {
      margin-top: 30px;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }
  </style>

  <script>
    document.querySelector(".h2-chat").innerHTML = "Ayo semangat belajarnya!";

    const chatForm = document.querySelector(".ketik-chat");
    const chatContainer = document.querySelector(".isi-chat");

    chatForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const pesanInput = chatForm.elements.pesan;
      const pesan = pesanInput.value.trim();
      pesanInput.value = "";

      if (pesan !== "") {
        const userPesan = document.createElement("div");
        userPesan.classList.add("pesan");
        userPesan.innerHTML = `
          <h3 style="color:white">User</h3>
          ${pesan}
        `;
        chatContainer.insertAdjacentElement("afterbegin", userPesan);

        const loadingContainer = document.createElement("div");
        loadingContainer.classList.add("loading-container");
        const loadingSpinner = document.createElement("div");
        loadingSpinner.classList.add("loading-spinner");
        loadingContainer.appendChild(loadingSpinner);
        chatContainer.insertAdjacentElement("afterbegin", loadingContainer);

        fetch("/req_soal", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
          },
          body: JSON.stringify({ pesan: pesan }),
        })
          .then(function (response) {
            if (response.ok) {
              return response.json(); 
            } else {
              throw new Error("Permintaan gagal");
            }
          })
          .then(function (data) {
            console.log(data); 
            const jawaban = data.tes;

            const paragraphs = Array.isArray(jawaban) ? jawaban : [jawaban];

            const smaPesanContainer = document.createElement("div");
            smaPesanContainer.classList.add("pesan");
            smaPesanContainer.innerHTML = `
              <h3 style="color:white">SMANIG</h3>
            `;

            paragraphs.forEach((paragraph) => {
                            const smaPesan = document.createElement("div");
              smaPesan.classList.add("pesan-container");

              const paragraphLines = paragraph.split("\n");
              paragraphLines.forEach((line) => {
                const paragraphElement = document.createElement("p");
                paragraphElement.textContent = line.trim();
                smaPesan.appendChild(paragraphElement);
              });

              smaPesanContainer.appendChild(smaPesan);
            });

            chatContainer.removeChild(loadingContainer);
            chatContainer.insertAdjacentElement("afterbegin", smaPesanContainer);
            chatContainer.scrollTop = chatContainer.scrollHeight;
          })
          .catch(function (error) {
            console.error("Terjadi kesalahan:", error);
          });
      }
    });
  </script>
</x-guest-layout>

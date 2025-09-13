
const teamMembers = [
  { name: "Alhaji Idris Shuaibu Miqati", position: "President (2023 - Date)", image: "img/president.jpg" },
  { name: "Mr Aare Akinwumi Akinyemi", position: "Vice President(I) (2023 - Date)", image: "img/vp1.jpg" },
  { name: "Mr. Ahmed Abdulkadir Firdaus", position: "Vice President(II) (2023 - Date)", image: "img/vp2.jpg" },
  { name: "Alhaji Salisu Ibrahim Indabawa", position: "Secretary General (2023 - Date)", image: "img/secgen.jpg" },
  { name: "Ms. Safiyya Stephanie Musa", position: "Financial Secretary (2023 - Date)", image: "img/finsec.jpg" },
  { name: "Alhaji Lawal Ali Gujungu", position: "Treasurer (2023 - Date)", image: "img/treasurer.jpg" },
  { name: "Amb. Adamu Babangida", position: "Internal Auditor (2023 - Date)", image: "img/auditor.jpg" },
  { name: "Barr. Saidu Tudunwada", position: "Legal Adviser (2023 - Date)", image: "img/legal.jpg" },
  { name: "Mal Mustapha A. Dawaki", position: "Social Welfare (2023 - Date)", image: "img/social.jpg" },
  { name: "Mukhtar Zubairu Surajo", position: "Publicity Secretary (2023 - Date)", image: "img/publicity.jpg" },
  { name: "Ms. Maryam D Suleiman", position: "Assistant Secretary General(I) (2023 - Date)", image: "img/asstsec1.jpg" },
  { name: "Mal Ma'aruf  Zakariyya", position: "Assistant Secretary (II) (2023 - Date)", image: "img/asstsec2.jpg" },
  { name: "Dr. Bala Muhammad", position: "Ex-Officio (North-West) (2023 - Date)", image: "img/ex-nw.jpg" },
  { name: "Alh. Ibrahim Idris Danisa", position: "Ex-Officio (North-East) (2023 - Date)", image: "img/ex-ne.jpg" },
  { name: "Barr. Lawrence Juwah", position: "Ex-Officio (South-South) (2023 - Date)", image: "img/ex-ss.jpg" },
  { name: "Comrade Aliyu Emu Yusuf", position: "Ex-Officio (North-Central) (2023 - Date)", image: "img/ex-nc.jpg" },
  { name: "Joseph Adewale Rennaiye", position: "Ex-Officio (South-West) (2023 - Date)", image: "img/ex-sw.jpg" },
  { name: "Mrs Georgina Ekeka", position: "Ex-Officio (South-East) (2023 - Date)", image: "img/ex-se.jpeg" }

];

const itemsPerPage = 4;
const teamContainer = document.getElementById("team-container");
const paginationLinks = document.querySelectorAll(".page-link");

function displayPage(page) {
  teamContainer.innerHTML = "";
  const start = (page - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  const membersToShow = teamMembers.slice(start, end);

  membersToShow.forEach(member => {
    const card = `
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card-item">
          <div class="row">
            <div class="col-xl-5">
              <div class="card-bg" style="background-image: url(${member.image});"></div>
            </div>
            <div class="col-xl-7 d-flex align-items-center">
              <div class="card-body">
                <h4 class="card-title">${member.name}</h4>
                <p>${member.position}</p>
                <p><a href="#">View Profile</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>`;
    teamContainer.insertAdjacentHTML("beforeend", card);
  });
}

paginationLinks.forEach(link => {
  link.addEventListener("click", function (e) {
    e.preventDefault();
    const page = parseInt(this.getAttribute("data-page"));
    displayPage(page);
    paginationLinks.forEach(l => l.classList.remove("active"));
    this.classList.add("active");
  });
});

// Display the first page by default
displayPage(1);

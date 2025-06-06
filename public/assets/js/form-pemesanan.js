document.addEventListener('DOMContentLoaded', function () {
  const sectionMakeSure = document.getElementById('section-makesure'),
    sectionForm = document.getElementById('section-form'),
    sectionFormBio0 = document.getElementById('section-form-bio-0'),
    sectionFormBio1 = document.getElementById('section-form-bio-1'),
    sectionFormPemesanan0 = document.getElementById('section-form-pemesanan-0'),
    sectionFormPemesanan1 = document.getElementById('section-form-pemesanan-1'),
    sectionFormPemesanan2 = document.getElementById('section-form-pemesanan-2'),
    sectionFormPemesanan3 = document.getElementById('section-form-pemesanan-3');

  const btnPesanMakeSure = document.getElementById('btn-pesan'),
    btnFormBioNext0 = document.getElementById('btn-selanjutnya-1'),
    btnFormBioNext1 = document.getElementById('btn-selanjutnya-2'),
    btnFormPemesanan0 = document.getElementById('btn-selanjutnya-3'),
    btnFormPemesanan1 = document.getElementById('btn-selanjutnya-4'),
    btnFormPemesanan2 = document.getElementById('btn-selanjutnya-5'),
    btnBack0 = document.getElementById('btn-back-0'),
    btnBack1 = document.getElementById('btn-back-1'),
    btnBack2 = document.getElementById('btn-back-2'),
    btnBack3 = document.getElementById('btn-back-3'),
    btnBack4 = document.getElementById('btn-back-4'),
    btnBack5 = document.getElementById('btn-back-5');

  // Section 1: Data Diri
  const namaLengkap = document.getElementById('nama');
  const noWa = document.getElementById('wa');
  const instagram = document.getElementById('instagram');
  // const memberId = document.querySelector('input[name="member_id"]');
  // const fotoKartuMember = document.querySelector('input[name="foto_kartu_member"]');

  // Section 2: Informasi Bank
  const noRekening = document.getElementById('norek');
  const namaBank = document.getElementById('bank');

  // Section 3: Informasi Pemesanan
  const tanggalBooking = document.getElementById('tanggal_booking');
  const jamBooking = document.getElementById('jam_booking');
  const totalOrangFoto = document.getElementById('total_orang');
  // Show first form section
  btnPesanMakeSure.onclick = function () {
    header.style.backgroundColor = '#2c4257cb';
    logonav.style.width = '30px';
    listnav.style.alignItems = 'center';
    listnav.style.margin = '15px';
    sectionMakeSure.style.display = 'none';
    sectionForm.classList.remove('hidden');
    sectionFormBio0.classList.remove('hidden');
    headerStatus = true;
  };

  // Navigate forward
  btnFormBioNext0.onclick = function () {
    if (namaLengkap.value == '' || noWa.value == '' || instagram.value == '') {
      alert('Lengkapi Form nya');
    } else {
      sectionFormBio0.classList.add('hidden');
      sectionFormBio1.classList.remove('hidden');
    }
  };
  btnFormBioNext1.onclick = function () {
    if (namaBank.value == '' || noRekening.value == '') {
      alert('Lengkapi Form nya');
    } else {
      sectionFormBio1.classList.add('hidden');
      sectionFormPemesanan0.classList.remove('hidden');
    }
  };

  btnFormPemesanan0.onclick = function () {
    if (tanggalBooking.value == '' || jamBooking.value == '' || totalOrangFoto.value == '') {
      alert('Lengkapi Form nya');
    } else {
      sectionFormPemesanan0.classList.add('hidden');
      sectionFormPemesanan1.classList.remove('hidden');
    }
  };

  btnFormPemesanan1.onclick = function () {
    sectionFormPemesanan1.classList.add('hidden');
    sectionFormPemesanan2.classList.remove('hidden');
  };

  btnFormPemesanan2.onclick = function () {
    sectionFormPemesanan2.classList.add('hidden');
    sectionFormPemesanan3.classList.remove('hidden');
  };

  // Navigate backward
  btnBack0.onclick = function () {
    header.style.backgroundColor = 'transparent';
    logonav.style.width = '60px';
    listnav.style.margin = '20px';
    listnav.style.alignItems = 'normal';
    sectionMakeSure.style.display = 'flex';
    sectionMakeSure.classList.remove('hidden');
    sectionForm.classList.add('hidden');
  };
  btnBack1.onclick = function () {
    sectionFormBio1.classList.add('hidden');
    sectionFormBio0.classList.remove('hidden');
  };
  btnBack2.onclick = function () {
    sectionFormPemesanan0.classList.add('hidden');
    sectionFormBio1.classList.remove('hidden');
  };

  btnBack3.onclick = function () {
    sectionFormPemesanan1.classList.add('hidden');
    sectionFormPemesanan0.classList.remove('hidden');
  };

  btnBack4.onclick = function () {
    sectionFormPemesanan2.classList.add('hidden');
    sectionFormPemesanan1.classList.remove('hidden');
  };
  btnBack5.onclick = function () {
    sectionFormPemesanan3.classList.add('hidden');
    sectionFormPemesanan2.classList.remove('hidden');
  };
});

function openModal(idModal) {
  document.getElementById(idModal).style.display = 'block';
}

function closeModal(idModal) {
  document.getElementById(idModal).style.display = 'none';
}

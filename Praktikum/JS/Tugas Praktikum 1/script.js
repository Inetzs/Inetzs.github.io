function konversiNilai() {
    var nilaiInput = document.getElementById('nilaiInput').value;
    var hasilKonversi = document.getElementById('hasilKonversi');
  
    if (nilaiInput >= 0 && nilaiInput <= 40) {
      hasilKonversi.innerHTML = 'Nilai Anda: E';
    } else if (nilaiInput >= 41 && nilaiInput <= 55) {
      hasilKonversi.innerHTML = 'Nilai Anda: D';
    } else if (nilaiInput >= 56 && nilaiInput <= 60) {
      hasilKonversi.innerHTML = 'Nilai Anda: C';
    } else if (nilaiInput >= 61 && nilaiInput <= 65) {
      hasilKonversi.innerHTML = 'Nilai Anda: BC';
    } else if (nilaiInput >= 66 && nilaiInput <= 70) {
      hasilKonversi.innerHTML = 'Nilai Anda: B';
    } else if (nilaiInput >= 71 && nilaiInput <= 80) {
      hasilKonversi.innerHTML = 'Nilai Anda: BA';
    } else if (nilaiInput >= 81 && nilaiInput <= 100) {
      hasilKonversi.innerHTML = 'Nilai Anda: A';
    } else {
      hasilKonversi.innerHTML = 'Masukkan nilai antara 0 dan 100';
    }
  }
  
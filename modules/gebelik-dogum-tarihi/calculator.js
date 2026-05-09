function hcDogumTarihiHesapla() {
    const lmpVal = document.getElementById('hc-edd-lmp').value;

    if (!lmpVal) {
        alert('Lütfen son adet tarihinizi seçin.');
        return;
    }

    const lmp = new Date(lmpVal);
    const today = new Date();

    // EDD = LMP + 280 days
    const edd = new Date(lmp.getTime() + (280 * 24 * 60 * 60 * 1000));
    
    // Weeks = (Today - LMP) / 7 days
    const diffTime = today - lmp;
    const diffDays = Math.floor(diffTime / (24 * 60 * 60 * 1000));
    const weeks = Math.floor(diffDays / 7);
    const days = diffDays % 7;

    // Countdown to EDD
    const remainingDays = Math.floor((edd - today) / (24 * 60 * 60 * 1000));

    document.getElementById('hc-edd-value').innerText = edd.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    document.getElementById('hc-edd-week').innerText = weeks + " Hafta " + days + " Gün";
    
    if (remainingDays > 0) {
        document.getElementById('hc-edd-countdown').innerText = "Doğuma " + remainingDays + " gün kaldı.";
    } else {
        document.getElementById('hc-edd-countdown').innerText = "Doğum zamanı gelmiş veya geçmiş olabilir!";
    }

    document.getElementById('hc-due-date-result').classList.add('visible');
}

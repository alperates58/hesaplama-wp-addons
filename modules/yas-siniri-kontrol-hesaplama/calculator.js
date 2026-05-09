function hcAgeCheckHesapla() {
    const birthStr = document.getElementById('hc-age-birth').value;
    const limit = parseInt(document.getElementById('hc-age-limit').value);

    if (!birthStr) {
        alert('Lütfen doğum tarihinizi seçin.');
        return;
    }

    const birthDate = new Date(birthStr);
    const today = new Date();
    
    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    const statusBadge = document.getElementById('hc-res-age-status');
    const diffText = document.getElementById('hc-res-age-diff');

    document.getElementById('hc-res-age-current').innerText = age;

    if (age >= limit) {
        statusBadge.innerText = 'UYGUN';
        statusBadge.className = 'hc-status-badge success';
        diffText.innerText = `Sınırı ${age - limit} yıl ile geçtiniz.`;
    } else {
        statusBadge.innerText = 'UYGUN DEĞİL';
        statusBadge.className = 'hc-status-badge danger';
        diffText.innerText = `Sınıra ulaşmanıza ${limit - age} yıl var.`;
    }

    document.getElementById('hc-age-check-result').classList.add('visible');
}

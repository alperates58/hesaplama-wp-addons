function hcAdetDongusuHesapla() {
    const lastVal = document.getElementById('hc-mc-last').value;
    const prevVal = document.getElementById('hc-mc-prev').value;

    if (!lastVal || !prevVal) {
        alert('Lütfen her iki tarihi de seçin.');
        return;
    }

    const last = new Date(lastVal);
    const prev = new Date(prevVal);

    if (last <= prev) {
        alert('Son adet tarihi bir önceki tarihten sonra olmalıdır.');
        return;
    }

    const diffDays = Math.floor((last - prev) / (24 * 60 * 60 * 1000));
    const next = new Date(last.getTime() + (diffDays * 24 * 60 * 60 * 1000));

    document.getElementById('hc-mc-len').innerText = diffDays + " Gün";
    document.getElementById('hc-mc-next').innerText = next.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });

    const status = document.getElementById('hc-mc-status');
    if (diffDays >= 21 && diffDays <= 35) {
        status.innerText = "Döngünüz normal aralıktadır.";
        status.style.color = "#2e7d32";
    } else {
        status.innerText = "Döngünüz standart dışı olabilir (21-35 gün normal kabul edilir).";
        status.style.color = "#c62828";
    }

    document.getElementById('hc-menstrual-result').classList.add('visible');
}

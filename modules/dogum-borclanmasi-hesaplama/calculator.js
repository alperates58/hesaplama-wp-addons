function hcDogumBorcHesapla() {
    const count = parseInt(document.getElementById('hc-dog-count').value) || 0;
    let daysPerChild = parseInt(document.getElementById('hc-dog-days').value) || 0;

    if (daysPerChild > 720) daysPerChild = 720;
    if (daysPerChild <= 0) {
        alert('Lütfen geçerli bir gün sayısı giriniz.');
        return;
    }

    const totalDays = count * daysPerChild;
    const dailyCost = 352.32; // 2026 min rate
    const total = totalDays * dailyCost;

    document.getElementById('hc-dog-res-days').innerText = totalDays.toLocaleString('tr-TR') + ' Gün';
    document.getElementById('hc-dog-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-dogum-result').classList.add('visible');
}

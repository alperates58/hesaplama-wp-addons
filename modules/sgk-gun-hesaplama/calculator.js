function hcSGKGunHesapla() {
    const startStr = document.getElementById('hc-sgh-start').value;
    const endStr = document.getElementById('hc-sgh-end').value;

    if (!startStr || !endStr) {
        alert('Lütfen başlangıç ve bitiş tarihlerini giriniz.');
        return;
    }

    const start = new Date(startStr);
    const end = new Date(endStr);

    if (end < start) {
        alert('Bitiş tarihi başlangıç tarihinden önce olamaz.');
        return;
    }

    let y1 = start.getFullYear();
    let m1 = start.getMonth() + 1;
    let d1 = start.getDate();

    let y2 = end.getFullYear();
    let m2 = end.getMonth() + 1;
    let d2 = end.getDate();

    // SGK 30-day rule adjustments
    if (d1 === 31) d1 = 30;
    if (d2 === 31) d2 = 30;
    
    // February adjustment (if full month is worked, it's 30 days)
    // For simplicity, SGK standard calculation:
    const totalDays = ((y2 - y1) * 360) + ((m2 - m1) * 30) + (d2 - d1) + 1;

    document.getElementById('hc-sgh-res-total').innerText = totalDays.toLocaleString('tr-TR') + ' Gün';

    document.getElementById('hc-sgk-gun-result').classList.add('visible');
}

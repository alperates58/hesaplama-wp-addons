function hcEYTHesapla() {
    const gender = document.getElementById('hc-eyt-gender').value;
    const startStr = document.getElementById('hc-eyt-start').value;
    const currentDays = parseInt(document.getElementById('hc-eyt-days').value) || 0;

    if (!startStr) {
        alert('Lütfen sigorta başlangıç tarihinizi giriniz.');
        return;
    }

    const startDate = new Date(startStr);
    const eytLimit = new Date('1999-09-08');

    if (startDate >= eytLimit) {
        alert('Seçtiğiniz tarih EYT kapsamında değildir. Başlangıç 08.09.1999 öncesi olmalıdır.');
        return;
    }

    // Conservative EYT SSK table for days (approx)
    // In EYT law (7438), the table from law 4447 was initially removed but then 
    // it was clarified that the old law (before 1999) 5000-5975 days apply.
    // For simplicity and common practice, we'll use 5975 as the safest target.
    const requiredDays = 5975;
    const requiredPeriodYears = (gender === 'male') ? 25 : 20;

    const today = new Date('2026-05-08');
    const periodYears = (today - startDate) / (1000 * 60 * 60 * 24 * 365.25);
    
    const daysLeft = Math.max(0, requiredDays - currentDays);
    const yearsLeft = Math.max(0, requiredPeriodYears - periodYears);

    let status = "EYT Kapsamındasınız";
    let finalMsg = "";

    if (daysLeft === 0 && yearsLeft === 0) {
        finalMsg = "Emekli Olabilirsiniz!";
        document.getElementById('hc-eyt-res-final').style.color = "#27ae60";
    } else {
        finalMsg = "Şartların Dolması Bekleniyor";
        document.getElementById('hc-eyt-res-final').style.color = "#e67e22";
    }

    document.getElementById('hc-eyt-res-status').innerText = status;
    document.getElementById('hc-eyt-res-req').innerText = requiredDays.toLocaleString('tr-TR');
    document.getElementById('hc-eyt-res-left').innerText = daysLeft.toLocaleString('tr-TR');
    document.getElementById('hc-eyt-res-period').innerText = requiredPeriodYears + " Yıl (" + Math.floor(periodYears) + " yıl doldu)";
    document.getElementById('hc-eyt-res-final').innerText = finalMsg;

    document.getElementById('hc-eyt-result').classList.add('visible');
}

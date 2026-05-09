function hcBebekYasiHesapla() {
    const dogumTarihiStr = document.getElementById('hc-by-dogum').value;
    const isPrema = document.getElementById('hc-by-prema').value === 'evet';
    const hafta = parseInt(document.getElementById('hc-by-hafta').value);

    if (!dogumTarihiStr) {
        alert('Lütfen doğum tarihini seçiniz.');
        return;
    }

    const dogum = new Date(dogumTarihiStr);
    const bugun = new Date();
    
    if (dogum > bugun) {
        alert('Doğum tarihi bugünden büyük olamaz.');
        return;
    }

    const farkMs = bugun - dogum;
    const farkGun = Math.floor(farkMs / (1000 * 60 * 60 * 24));
    const farkHafta = Math.floor(farkGun / 7);

    // Chronological Age Calculation
    let years = bugun.getFullYear() - dogum.getFullYear();
    let months = bugun.getMonth() - dogum.getMonth();
    let days = bugun.getDate() - dogum.getDate();

    if (days < 0) {
        months--;
        const lastMonth = new Date(bugun.getFullYear(), bugun.getMonth(), 0);
        days += lastMonth.getDate();
    }
    if (months < 0) {
        years--;
        months += 12;
    }

    let kronText = '';
    if (years > 0) kronText += years + ' Yıl ';
    if (months > 0) kronText += months + ' Ay ';
    kronText += days + ' Gün';

    document.getElementById('hc-res-by-kron').innerText = kronText;
    document.getElementById('hc-res-by-toplam-gun').innerText = farkGun.toLocaleString('tr-TR');
    document.getElementById('hc-res-by-toplam-hafta').innerText = farkHafta.toLocaleString('tr-TR');

    // Adjusted Age for Preemies
    if (isPrema && !isNaN(hafta)) {
        // Normal gestation is 40 weeks. Difference is 40 - hafta
        const eksikHafta = 40 - hafta;
        const eksikGun = eksikHafta * 7;
        
        const duzeltilmisMs = farkMs - (eksikGun * 1000 * 60 * 60 * 24);
        
        if (duzeltilmisMs < 0) {
            document.getElementById('hc-res-by-duz').innerText = 'Bebek henüz tahmini doğum tarihine ulaşmadı.';
        } else {
            const duzDogum = new Date(dogum.getTime() + (eksikGun * 1000 * 60 * 60 * 24));
            
            let dYears = bugun.getFullYear() - duzDogum.getFullYear();
            let dMonths = bugun.getMonth() - duzDogum.getMonth();
            let dDays = bugun.getDate() - duzDogum.getDate();

            if (dDays < 0) {
                dMonths--;
                const lastMonth = new Date(bugun.getFullYear(), bugun.getMonth(), 0);
                dDays += lastMonth.getDate();
            }
            if (dMonths < 0) {
                dYears--;
                dMonths += 12;
            }

            let duzText = '';
            if (dYears > 0) duzText += dYears + ' Yıl ';
            if (dMonths > 0) duzText += dMonths + ' Ay ';
            duzText += dDays + ' Gün';
            
            document.getElementById('hc-res-by-duz').innerText = duzText;
        }
        document.getElementById('hc-res-by-duz-group').style.display = 'block';
    } else {
        document.getElementById('hc-res-by-duz-group').style.display = 'none';
    }

    document.getElementById('hc-bebek-yasi-result').classList.add('visible');
}

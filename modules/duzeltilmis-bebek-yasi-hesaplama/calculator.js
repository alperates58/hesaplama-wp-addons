function hcDuzeltilmisYasHesapla() {
    const dogumDate = new Date(document.getElementById('hc-dby-dogum').value);
    const hafta = parseInt(document.getElementById('hc-dby-hafta').value);
    if (isNaN(dogumDate.getTime()) || isNaN(hafta)) { alert('Lütfen bilgileri giriniz.'); return; }
    
    const bugun = new Date();
    const farkMs = bugun - dogumDate;
    const eksikHafta = 40 - hafta;
    const duzeltilmisMs = farkMs - (eksikHafta * 7 * 24 * 60 * 60 * 1000);

    if (duzeltilmisMs < 0) {
        document.getElementById('hc-res-dby-yas').innerText = 'Henüz doğması gereken tarihe ulaşmadı.';
    } else {
        const dDaysTotal = Math.floor(duzeltilmisMs / (1000 * 60 * 60 * 24));
        const dMonths = Math.floor(dDaysTotal / 30.44);
        const dDays = Math.floor(dDaysTotal % 30.44);
        document.getElementById('hc-res-dby-yas').innerText = dMonths + ' Ay, ' + dDays + ' Gün';
    }
    document.getElementById('hc-duzeltilmis-yas-result').classList.add('visible');
}

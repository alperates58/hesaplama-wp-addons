function hcShoeSizeHesapla() {
    const cm = parseFloat(document.getElementById('hc-foot-cm').value);

    if (isNaN(cm) || cm < 10) {
        alert('Lütfen geçerli bir uzunluk giriniz.');
        return;
    }

    // EU Standard: (cm + 1.5) * 1.5
    const eu = Math.round((cm + 1.5) * 1.5);
    
    // US/UK approximations
    const usM = (eu - 33).toFixed(1);
    const uk = (eu - 32.5).toFixed(1);

    document.getElementById('hc-res-shoe-num').innerText = eu;
    document.getElementById('hc-res-shoe-us-m').innerText = usM;
    document.getElementById('hc-res-shoe-uk').innerText = uk;
    
    document.getElementById('hc-shoe-size-result').classList.add('visible');
}

function hcAkcigerKapasitesiHesapla() {
    const tv = parseFloat(document.getElementById('hc-ak-tv').value);
    const irv = parseFloat(document.getElementById('hc-ak-irv').value);
    const erv = parseFloat(document.getElementById('hc-ak-erv').value);
    const rv = parseFloat(document.getElementById('hc-ak-rv').value);

    if (isNaN(tv) || isNaN(irv) || isNaN(erv) || isNaN(rv)) {
        alert('Lütfen tüm hacim değerlerini giriniz.');
        return;
    }

    const vc = tv + irv + erv;
    const ic = tv + irv;
    const frc = erv + rv;
    const tlc = vc + rv;

    document.getElementById('hc-ak-res-vc').innerText = vc.toLocaleString('tr-TR');
    document.getElementById('hc-ak-res-ic').innerText = ic.toLocaleString('tr-TR');
    document.getElementById('hc-ak-res-frc').innerText = frc.toLocaleString('tr-TR');
    document.getElementById('hc-ak-res-tlc').innerText = tlc.toLocaleString('tr-TR');

    document.getElementById('hc-akciger-kapasitesi-result').classList.add('visible');
}

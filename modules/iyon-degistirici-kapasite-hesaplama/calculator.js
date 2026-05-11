function hcIonCapHesapla() {
    const vSu = parseFloat(document.getElementById('hc-ic-vsu').value);
    const dc = parseFloat(document.getElementById('hc-ic-dc').value);
    const vR = parseFloat(document.getElementById('hc-ic-vr').value);

    if (isNaN(vSu) || isNaN(dc) || isNaN(vR) || vR <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Capacity (meq/L resin) = (V_su(m3) * 1000 * Delta_C(meq/L)) / V_reçine(L)
    const capMeqL = (vSu * 1000 * dc) / vR;
    const capEqL = capMeqL / 1000;

    document.getElementById('hc-ic-res-val').innerText = capEqL.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' eq/L reçine';
    
    document.getElementById('hc-ic-result').classList.add('visible');
}

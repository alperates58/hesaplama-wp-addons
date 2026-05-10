function hcViskoziteDönüşümüHesapla() {
    const val = parseFloat(document.getElementById('hc-v-val').value);
    const type = document.getElementById('hc-v-type').value;
    const rho = parseFloat(document.getElementById('hc-v-rho').value);

    if (!val || !rho) return;

    // cSt = cP / rho
    // cP = cSt * rho
    
    let res = 0;
    let unit = "";

    if (type === 'cp_to_cst') {
        res = val / rho;
        unit = " cSt";
    } else {
        res = val * rho;
        unit = " cP";
    }

    document.getElementById('hc-v-res').innerText = res.toFixed(2) + unit;
    document.getElementById('hc-v-result').classList.add('visible');
}

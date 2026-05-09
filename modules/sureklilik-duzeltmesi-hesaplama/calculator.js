function hcContCorrHesapla() {
    const x = parseFloat(document.getElementById('hc-cc-x').value) || 0;
    const type = document.getElementById('hc-cc-type').value;

    let result = '';
    switch(type) {
        case 'eq': result = `${x - 0.5} < X < ${x + 0.5}`; break;
        case 'le': result = `X < ${x + 0.5}`; break;
        case 'ge': result = `X > ${x - 0.5}`; break;
        case 'lt': result = `X < ${x - 0.5}`; break;
        case 'gt': result = `X > ${x + 0.5}`; break;
    }

    document.getElementById('hc-res-cc-val').innerText = result;
    document.getElementById('hc-cont-corr-result').classList.add('visible');
}

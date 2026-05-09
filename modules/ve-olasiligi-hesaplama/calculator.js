function hcAndProbToggle() {
    const type = document.getElementById('hc-ap-type').value;
    document.getElementById('hc-ap-cond-group').style.display = (type === 'dependent') ? 'block' : 'none';
    document.getElementById('hc-ap-pb-group').style.display = (type === 'independent') ? 'block' : 'none';
}

function hcAndProbHesapla() {
    const pa = (parseFloat(document.getElementById('hc-ap-pa').value) || 0) / 100;
    const type = document.getElementById('hc-ap-type').value;

    let pAnd = 0;
    if (type === 'independent') {
        const pb = (parseFloat(document.getElementById('hc-ap-pb').value) || 0) / 100;
        pAnd = pa * pb;
    } else {
        const pba = (parseFloat(document.getElementById('hc-ap-pba').value) || 0) / 100;
        pAnd = pa * pba;
    }

    document.getElementById('hc-res-ap-val').innerText = '%' + (pAnd * 100).toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-and-prob-result').classList.add('visible');
}

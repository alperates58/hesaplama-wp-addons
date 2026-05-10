function hcOluBoslukHesapla() {
    const paco2 = parseFloat(document.getElementById('hc-ob-paco2').value);
    const peco2 = parseFloat(document.getElementById('hc-ob-peco2').value);

    if (isNaN(paco2) || isNaN(peco2) || paco2 === 0) {
        alert('Lütfen geçerli PaCO2 ve PECO2 değerleri giriniz.');
        return;
    }

    const vdvt = (paco2 - peco2) / paco2;
    const resVal = document.getElementById('hc-ob-res-val');
    const resDesc = document.getElementById('hc-ob-res-desc');

    resVal.innerText = vdvt.toFixed(3).toLocaleString('tr-TR');

    if (vdvt < 0.3) {
        resDesc.innerText = 'Normal (Genellikle 0.20 - 0.35 arası).';
        resDesc.style.color = '#27ae60';
    } else {
        resDesc.innerText = 'Yüksek (Artmış ölü boşluk, gaz değişimi bozukluğu göstergesi).';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-olu-bosluk-result').classList.add('visible');
}

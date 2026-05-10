function hcBinAddHesapla() {
    const s1 = document.getElementById('hc-ba-s1').value.trim();
    const s2 = document.getElementById('hc-ba-s2').value.trim();

    if (!/^[01]+$/.test(s1) || !/^[01]+$/.test(s2)) {
        alert('Lütfen geçerli ikili sayılar giriniz.');
        return;
    }

    const sum = (parseInt(s1, 2) + parseInt(s2, 2));
    const resultBin = sum.toString(2);

    document.getElementById('hc-ba-res-val').innerText = resultBin;
    document.getElementById('hc-ba-res-dec').innerText = `Onluk Karşılığı: ${sum}`;
    document.getElementById('hc-bin-add-result').classList.add('visible');
}

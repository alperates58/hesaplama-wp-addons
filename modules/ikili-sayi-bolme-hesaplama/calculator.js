function hcBinDivHesapla() {
    const s1 = document.getElementById('hc-bd-s1').value.trim();
    const s2 = document.getElementById('hc-bd-s2').value.trim();

    if (!/^[01]+$/.test(s1) || !/^[01]+$/.test(s2)) {
        alert('Lütfen geçerli ikili sayılar giriniz.');
        return;
    }

    const d1 = parseInt(s1, 2);
    const d2 = parseInt(s2, 2);

    if (d2 === 0) {
        alert('Sıfıra bölme yapılamaz.');
        return;
    }

    const quo = Math.floor(d1 / d2).toString(2);
    const rem = (d1 % d2).toString(2);

    document.getElementById('hc-bd-res-quo').innerText = quo;
    document.getElementById('hc-bd-res-rem').innerText = rem;
    document.getElementById('hc-bin-div-result').classList.add('visible');
}

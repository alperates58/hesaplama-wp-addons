function hcBraSizeHesapla() {
    const under = parseFloat(document.getElementById('hc-bra-under').value);
    const over = parseFloat(document.getElementById('hc-bra-over').value);

    if (isNaN(under) || isNaN(over) || under >= over) {
        alert('Lütfen geçerli ölçüler giriniz.');
        return;
    }

    // Band size
    let band = 70;
    if (under >= 108) band = 110;
    else if (under >= 103) band = 105;
    else if (under >= 98) band = 100;
    else if (under >= 93) band = 95;
    else if (under >= 88) band = 90;
    else if (under >= 83) band = 85;
    else if (under >= 78) band = 80;
    else if (under >= 73) band = 75;
    else if (under >= 68) band = 70;

    // Cup size
    const diff = over - under;
    let cup = "A";
    if (diff >= 22) cup = "F";
    else if (diff >= 20) cup = "E";
    else if (diff >= 18) cup = "D";
    else if (diff >= 16) cup = "C";
    else if (diff >= 14) cup = "B";
    else if (diff >= 12) cup = "A";
    else cup = "AA";

    document.getElementById('hc-res-bra-val').innerText = band + cup;
    document.getElementById('hc-bra-size-result').classList.add('visible');
}

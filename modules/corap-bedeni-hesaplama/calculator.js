function hcÇorapBedeniHesapla() {
    const shoe = parseFloat(document.getElementById('hc-sk-shoe').value);

    if (!shoe) return;

    let size = "39-42";
    if (shoe < 35) size = "Çocuk / XS";
    else if (shoe <= 38) size = "35-38 (S)";
    else if (shoe <= 42) size = "39-42 (M)";
    else if (shoe <= 46) size = "43-46 (L)";
    else size = "47+ (XL)";

    document.getElementById('hc-sk-val').innerText = size;
    document.getElementById('hc-sk-result').classList.add('visible');
}

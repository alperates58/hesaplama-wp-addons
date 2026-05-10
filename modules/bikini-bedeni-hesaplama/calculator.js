function hcBikiniBedeniHesapla() {
    const bust = parseFloat(document.getElementById('hc-bk-bust').value);
    const hip = parseFloat(document.getElementById('hc-bk-hip').value);

    if (!bust || !hip) return;

    let topSize = "S";
    if (bust <= 84) topSize = "XS";
    else if (bust <= 88) topSize = "S";
    else if (bust <= 92) topSize = "M";
    else if (bust <= 96) topSize = "L";
    else topSize = "XL";

    let bottomSize = "S";
    if (hip <= 90) bottomSize = "XS";
    else if (hip <= 94) bottomSize = "S";
    else if (hip <= 98) bottomSize = "M";
    else if (hip <= 102) bottomSize = "L";
    else bottomSize = "XL";

    document.getElementById('hc-bk-val').innerText = `Üst: ${topSize} / Alt: ${bottomSize}`;
    document.getElementById('hc-bk-result').classList.add('visible');
}

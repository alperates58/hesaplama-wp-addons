function hcCuFormat(sayi) {
    return sayi.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
}

function hcCekmeUzunluguHesapla() {
    var kanat = parseFloat(document.getElementById('hc-cu-kanat').value);

    if (isNaN(kanat)) {
        alert('Lütfen kanat açıklığını cm olarak girin.');
        return;
    }

    if (kanat < 100 || kanat > 230) {
        alert('Lütfen gerçekçi bir kanat açıklığı değeri girin.');
        return;
    }

    var cekme = kanat / 2.5;
    var okAlt = cekme + 2.5;
    var okUst = cekme + 5;

    document.getElementById('hc-cu-cekme').textContent = hcCuFormat(cekme) + ' cm';
    document.getElementById('hc-cu-ok').textContent = hcCuFormat(okAlt) + ' - ' + hcCuFormat(okUst) + ' cm';
    document.getElementById('hc-cu-kanat-sonuc').textContent = hcCuFormat(kanat) + ' cm';
    document.getElementById('hc-cu-result').classList.add('visible');
}

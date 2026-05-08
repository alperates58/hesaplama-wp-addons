function hcLiseGecmeHesapla() {
    const avg = parseFloat(document.getElementById('hc-lsg-avg').value);
    const fails = parseInt(document.getElementById('hc-lsg-fails').value) || 0;

    if (isNaN(avg)) {
        alert('Lütfen ortalamanızı girin.');
        return;
    }

    let status = "";
    let info = "";

    if (avg >= 50) {
        if (fails === 0) {
            status = "Doğrudan Geçti";
            info = "Tebrikler, tüm derslerinizden başarılı oldunuz.";
        } else if (fails <= 3) {
            status = "Sorumlu Geçti";
            info = "Ortalamanız 50 üzerinde ancak zayıf dersleriniz olduğu için sorumlu olarak geçtiniz.";
        } else {
            status = "Sınıf Tekrarı";
            info = "Ortalamanız 50 üzerinde olsa da 3'ten fazla zayıf dersiniz bulunduğu için sınıf tekrarına kalabilirsiniz.";
        }
    } else {
        status = "Sınıf Tekrarı";
        info = "Ortalamanız 50'nin altında olduğu için sınıf tekrarına kaldınız.";
    }

    document.getElementById('hc-lsg-val').innerText = status;
    document.getElementById('hc-lsg-info').innerText = info;
    document.getElementById('hc-lsg-result').classList.add('visible');
}

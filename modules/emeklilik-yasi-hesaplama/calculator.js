function hcEmeklilikHesapla() {
    const gender = document.getElementById('hc-ey-gender').value;
    const entryYear = parseInt(document.getElementById('hc-ey-entry').value);
    
    let retirementAge = 0;
    let info = "";

    if (entryYear < 1999) {
        retirementAge = (gender === 'male' ? 58 : 56);
        info = "1999 öncesi girişliler için kademeli emeklilik yaşları geçerlidir.";
    } else if (entryYear < 2008) {
        retirementAge = (gender === 'male' ? 60 : 58);
        info = "1999-2008 arası girişliler için standart emeklilik yaşıdır.";
    } else {
        retirementAge = 65;
        info = "2008 sonrası girişliler için emeklilik yaşı kademeli olarak 65'e yükselmektedir.";
    }

    document.getElementById('hc-ey-val').innerText = retirementAge + " Yaş";
    document.getElementById('hc-ey-info').innerText = info;
    document.getElementById('hc-ey-result').classList.add('visible');
}

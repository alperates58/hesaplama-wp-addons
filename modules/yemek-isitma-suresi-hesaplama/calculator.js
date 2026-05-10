function hcReheatTimeHesapla() {
    const type = document.getElementById('hc-rt-type').value;
    const method = document.getElementById('hc-rt-method').value;

    let res = '';
    let info = '';

    if (method === 'microwave') {
        if (type === 'liquid') res = '2-3 Dakika';
        else if (type === 'solid') res = '1.5-2 Dakika';
        else res = '3-4 Dakika';
        info = 'Mikrodalgada ısıtırken yemeği ara ara karıştırmak eşit ısınmasını sağlar.';
    } else {
        if (type === 'liquid') res = '5-8 Dakika';
        else if (type === 'solid') res = '4-6 Dakika';
        else res = '10-15 Dakika';
        info = 'Kısık ateşte ve az miktarda su ekleyerek ısıtmanız yemeğin tazeliğini korur.';
    }

    document.getElementById('hc-rt-val').innerText = res;
    document.getElementById('hc-rt-info').innerText = info;
    document.getElementById('hc-reheat-result').classList.add('visible');
}

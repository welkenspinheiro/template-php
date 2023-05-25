import axios from 'axios';

async function getStarWarsPlanents(){
    try {
        const {data} = await axios.get('https://swapi.dev/api/planets/1/');
        console.log(data);
    } catch (error) {
        console.log(error.response);
    }
}

getStarWarsPlanents();
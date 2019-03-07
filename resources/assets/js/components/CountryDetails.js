import React, { Component } from 'react';
import { Router, Route, Link } from 'react-router';

class CountryDetails extends Component {

  constructor(props) {
    super(props);
    this.state = {
      urlCountry: '/api/v1/country/',
      urlGetCities: '/api/v1/getCities/',
      country: '',
      cities: [],
      languages: [],
      isFetching: false
    }
    this.fetchCityData = this.fetchCityData.bind(this);
  }

  componentDidMount() {
    if (!this.state.country || (this.state.country.countryCode.toLowerCase() !== this.props.countryCode.toLowerCase())) {
      this.fetchCountryData();
    }
  }

  fetchCountryData() {
    this.setState({ isFetching: true });

    if (this.props.countryCode) {
      let endpoint = this.state.urlCountry + this.props.countryCode;
      axios.get(endpoint)
        .then(response => {
          this.setState({
            country: response.data,
            languages: response.data.languages,
            isFetching: false
          });
        })
        .catch(function (error) {
          console.log(error);
        })
    }
  }

  fetchCityData() {
    this.setState({ isFetching: true });

    let endpoint = this.state.urlGetCities + this.props.countryCode;
    axios.get(endpoint)
      .then(response => {
        this.setState({
          cities: response.data,
          isFetching: false
        });
        console.log(this.state.cities);
      })
      .catch(function (error) {
        console.log(error);
      })
  }

  render() {
    if (this.state.isFetching) {
      return (
        <div className="alert alert-primary" role="alert">
          Loading data...
        </div>
      );
    } else {
      return (
        <div className="row">
          <div className="col-12">
            <h1>{this.state.country.name}</h1>
          </div>
          <div className="card col-12 col-sm-6">
            <div className="card-body">
              <h5 className="card-title">
                Details
            </h5>
              <ul className="list-group list-group-flush">
                <li className="list-group-item">
                  <b>Continent:</b> {this.state.country.continent}
                </li>
                <li className="list-group-item">
                  <b>Region:</b> {this.state.country.region}
                </li>
                <li className="list-group-item">
                  <b>Area:</b> {this.state.country.surfaceArea}
                </li>
                <li className="list-group-item">
                  <b>Population:</b> {this.state.country.population}
                </li>
                <li className="list-group-item">
                  <b>GDP:</b> {this.state.country.GDP}
                </li>
              </ul>
            </div>
          </div>
          <div className="card col-12 col-sm-6">
            <div className="card-body">
              <h5 className="card-title">
                Governament
            </h5>
              <ul className="list-group list-group-flush">
                <li className="list-group-item">
                  <b>Type:</b> {this.state.country.GovernamentType}
                </li>
                <li className="list-group-item">
                  <b>Head of State:</b> {this.state.country.headOfState}
                </li>
              </ul>
            </div>
          </div>
          <div className="card col-12">
            <div className="card-body">
              <h5 className="card-title">
                Languages
            </h5>
              <table className="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Official</th>
                    <th scope="col">Percentage</th>
                  </tr>
                </thead>
                <tbody>
                  {
                    this.state.languages.map((langs) => {
                      for (var k in langs) {
                        return (
                          <tr key={this.state.languages.indexOf(langs) + 1}>
                            <th scope="row">{this.state.languages.indexOf(langs) + 1}</th>
                            <td>{k}</td>
                            <td>{langs[k].isOficial.toString()}</td>
                            <td>{langs[k].percentage}</td>
                          </tr>
                        )
                      }
                    })
                  }
                </tbody>
              </table>
            </div>
          </div>
          <div id="cities" className="accordion col-12">
            <div className="card">
              <div className="card-header" id="headingOne">
                <h2 className="mb-0">
                  <button className="btn btn-link col-12" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" onClick={this.fetchCityData}>
                    View Cities
                  </button>
                </h2>
              </div>

              <div id="collapseOne" className="collapse show" aria-labelledby="headingOne" data-parent="#cities">
                <div className="card-body">

                </div>
              </div>

            </div>
          </div>
        </div>
      );
    }
  }

}

export default CountryDetails;
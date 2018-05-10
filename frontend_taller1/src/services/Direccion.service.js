import ApiService from './Api.service.js'

class DireccionService extends ApiService {
  constructor (endpoint) {
    super(endpoint)
    this.name = endpoint
  }
}

export const direccionService = new DireccionService('direcciones{/id}')

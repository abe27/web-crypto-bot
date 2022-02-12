import React, { useEffect, useState } from 'react'
import Authenticated from '@/Layouts/Authenticated'
import { Breadcrumbs, Header, RefreshAndBack, Skeletons } from '@/Components'
import { ApiTableView } from '@/Components/Apis'

const Api = (props) => {
  const [isLoadingRefesh, setIsLoadingRefesh] = useState(false)
  const [data, setData] = useState(null)

  const getApiData = async () => {
    setData(null)
    setIsLoadingRefesh(true)
    const obj = new Promise(async (resolve, reject) => {
      let x = await axios.get(route('api-data.get'))
      resolve(await x)
    })

    obj.then((r) => {
      setData(r.data.data)
      setIsLoadingRefesh(false)
    })
  }

  const updateApiData = (id) => {
    if ((typeof id) == 'boolean') {
      if (id) getApiData()
      return
    }
    setData(data.filter((i) => i.id !== id))
  }

  useEffect(() => {
    getApiData()
  }, [])

  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={<Breadcrumbs breadcrumbs={props.breadcrumbs} />}
    >
      <Header title={props.title} description={props.description} />
      <div className="">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="my-6 lg:my-2 container mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between pb-4 border-b border-gray-300">
            <div></div>
            <div className="mt-6 lg:mt-0">
              <RefreshAndBack
                isLoadingRefesh={isLoadingRefesh}
                reloadData={getApiData}
              />
            </div>
          </div>
          {/* Page title ends */}
          <div className="container mx-auto">
            <div className="w-full rounded">
              {!data && <Skeletons />}
              {data && (
                <ApiTableView apiData={data} onRefresh={updateApiData} />
              )}
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}

export default Api
